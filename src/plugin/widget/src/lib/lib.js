import { concat, remove } from "lodash";

import { DateTime } from "luxon";
import jsonata from "jsonata";
import i18n from "../i18n";

export const generateLink = (link, luxonTimestamp) => {
  return `${link}?date=${luxonTimestamp.toFormat(
    "ddMMyyyy"
  )}&time=${luxonTimestamp.toFormat("HHmm")}`;
};

export const convertToDate = (datetime) => {
  let date = new Date(datetime);
  return `${date.getUTCDate()}.${
    date.getMonth() + 1
  }.${date.getFullYear()} ${pad(date.getHours(), 2)}:${pad(
    date.getMinutes(),
    2
  )} Uhr`;
};

export const pad = (num, size) => {
  num = num.toString();
  while (num.length < size) num = "0" + num;
  return num;
};

export const getWeekDay = (dateLong, locale = "de") => {
  return DateTime.fromFormat(dateLong, "dd.MM.yyyy")
    .setLocale(locale)
    .toFormat("cccc");
};

export const formatDate = (datetime, locale = "de", long = true) => {
  return DateTime.fromFormat(datetime, "dd.MM.yyyy").toFormat(
    locale === "de"
      ? `dd.MM${long ? `.yyyy` : `.`}`
      : `MM/dd${long ? `/yyyy` : ``}`
  );
};

export const parseEvents = (eventsRaw, venuesData, data) => {
  const {
    taxonomies: { divisions, labels },
  } = data;

  let eventsParsed = [];

  typeof eventsRaw != undefined &&
    eventsRaw.map(
      (item) =>
        item.acf.meta.occurrences !== undefined &&
        item.acf.meta.occurrences.length > 0 &&
        item.acf.meta.occurrences.map((occ) => {
          const { timestamp } = occ;
          const luxonTimestamp = DateTime.fromFormat(
            timestamp,
            "yyyy/MM/dd HH:mm:ss"
          );
          return (
            occ.show_in_calendar === true &&
            eventsParsed.push({
              alarm: occ.alarm,
              dateLong: luxonTimestamp.toFormat("dd.MM.yyyy"),
              dateShort: luxonTimestamp.toFormat("dd.MM."),
              datetime: luxonTimestamp.toFormat("dd.MM.yyyy HH:mm"),
              division: item.division.length !== 0 ? item.division[0] : 0,
              duration: item.duration,
              feature_image: {
                sizes: item.acf.meta.feature_image.image.sizes,
                alt: item.acf.meta.feature_image.image.alt,
              },
              link: generateLink(item.link, luxonTimestamp),
              short_description: item.acf.meta.short_description,
              tags: concat(
                divisions?.divisions
                  ?.filter((division) => item.division.includes(division.id))
                  ?.map((divisionItem) => divisionItem.name),
                occ?.venue
                  ? venuesData[occ.venue[0].ID.toString()]?.acf?.address?.city
                  : "",
                labels?.labels
                  ?.filter((label) => item.label.includes(label.id))
                  ?.map((labelItem) => labelItem.name)
              ),
              ticketlink: occ.ticketlink,
              time: luxonTimestamp.toFormat("HH:mm"),
              timestamp: luxonTimestamp.toFormat("X"),
              title: item.title.rendered,
              city:
                occ.venue !== undefined && occ.venue.length > 0
                  ? venuesData[occ.venue[0].ID.toString()] !== undefined
                    ? venuesData[occ.venue[0].ID.toString()].acf.address.city
                    : ""
                  : null,
              venue:
                occ.venue !== undefined && occ.venue.length > 0
                  ? venuesData[occ.venue[0].ID.toString()] !== undefined
                    ? venuesData[occ.venue[0].ID.toString()].acf
                    : ""
                  : "",
            })
          );
        })
    );

  let expression = jsonata("*^(timestamp){dateLong:[$]}");
  return expression.evaluate(eventsParsed);
};

export const removeItem = (array, value) => {
  return remove(array, (el) => {
    return el !== value;
  });
};

export const generateSrcSet = (sizes) => {
  return `${sizes["thumbnail"]} ${sizes["thumbnail-width"]}w, ${sizes["medium"]} ${sizes["medium-width"]}w, ${sizes["medium_large"]} ${sizes["medium_large-width"]}w, ${sizes["large"]} ${sizes["large-width"]}w`;
};

export const loadEvents = async (setData, venuesData, data) => {
  const perPage = 99;
  const url = `https://kein-schlussstrich.de/wp-json/wp/v2/event?_fields=acf,link,title,division,label`;

  const requestTotalNumber = await fetch(`${url}&per_page=1`);

  const dataTotalNumber = await requestTotalNumber.headers.get("x-wp-total");

  const calls = Math.floor(dataTotalNumber / perPage) + 1;
  const urls = [];

  for (let i = 1; i < calls + 1; i++) {
    urls.push(`${url}&per_page=${perPage}&page=${i}`);
  }

  const response = await Promise.all(
    urls.map((url) => fetch(url).then((res) => res.json()))
  ).then((value) => [].concat.apply([], value));

  const WPevents = await response;
  const parsedWPEvents = parseEvents(WPevents, venuesData, data);
  const filterExpressionCities = jsonata(
    `$sort($distinct(*.venue.address.city))`
  );

  setData((prev) => ({
    ...prev,
    eventData: {
      initialEvents: parsedWPEvents,
      filteredEvents: parsedWPEvents,
    },
    taxonomies: {
      ...prev.taxonomies,
      cities: concat(
        i18n.t("filters.cities.allCities"),
        filterExpressionCities.evaluate(parsedWPEvents)
      ),
    },
  }));
};

export const loadVenues = async (setData) => {
  const response = await fetch(
    `https://kein-schlussstrich.de/wp-json/wp/v2/eventLocation?_fields=acf,id&per_page=100`
  );

  if (!response.ok) {
    return;
  }

  const WPvenues = await response.json();
  /* eslint-disable no-template-curly-in-string */
  let expression = jsonata("${$string(id):$}");

  setData((prev) => ({
    ...prev,
    venuesData: expression.evaluate(WPvenues),
  }));
};

export const scrollToDate = (filteredDates, currentDate, listRef) => {
  const offsetTopID =
    filteredDates[currentDate] !== undefined
      ? [...listRef.current.childNodes].filter((node) => {
          return node.id === filteredDates[currentDate].replace(/\./g, "");
        })[0].offsetTop
      : 0;

  const offsetTopList = listRef.current.offsetTop;

  listRef.current.scrollTop = offsetTopID - offsetTopList;
};

export const loadDivisions = async (setData) => {
  const response = await fetch(
    `https://kein-schlussstrich.de/wp-json/wp/v2/division?_fields=id,name&per_page=100`
  );

  if (!response.ok) {
    return;
  }

  const WPDivisions = await response.json();

  const filterDivisionNames = jsonata(WPDivisions.length > 0 ? `$.name` : `$`);
  setData((prev) => ({
    ...prev,
    taxonomies: {
      ...prev.taxonomies,
      divisions: {
        divisions: concat(
          { id: 0, name: i18n.t("filters.divisions.allDivisions") },
          WPDivisions
        ),
        divisionsNames: concat(
          i18n.t("filters.divisions.allDivisions"),
          filterDivisionNames.evaluate(WPDivisions)
        ),
      },
    },
  }));
};

export const loadLabels = async (setData) => {
  const response = await fetch(
    `https://kein-schlussstrich.de/wp-json/wp/v2/label?_fields=id,name&per_page=100`
  );

  if (!response.ok) {
    return;
  }

  const WPLabels = await response.json();

  const filterLabelsNames = jsonata(WPLabels.length > 0 ? `$.name` : `$`);

  setData((prev) => ({
    ...prev,
    taxonomies: {
      ...prev.taxonomies,
      labels: {
        labels: WPLabels,
        labelsNames: filterLabelsNames.evaluate(WPLabels),
      },
    },
  }));
};

export const filterEvents = (data, setData) => {
  const {
    eventData: { initialEvents },
    filters: { division, city, currentDate },
  } = data;

  division !== null &&
    window.history.replaceState(
      null,
      "Veranstaltungskalender",
      `${currentDate || (division !== null ? `?` : ``)}${
        currentDate !== null ? `date=${currentDate}` : ``
      }${
        division !== null
          ? `${currentDate !== null ? `&` : ``}saeule=${division}`
          : ``
      }`
    );

  const filterExpression = jsonata(
    division !== null || city !== null
      ? `($filter(*, function($v) {
         ${division !== null ? `$v."division" = ${division}` : ``} ${
          division !== null && city !== null ? `and` : ``
        } ${city !== null ? `$v."city" = "${city}"` : ``}
       }))^(timestamp){dateLong:[$]}`
      : `$`
  );

  division !== "" && city !== ""
    ? setData((prev) => ({
        ...prev,
        eventData: {
          ...prev.eventData,
          filteredEvents: filterExpression.evaluate(initialEvents),
        },
      }))
    : setData((prev) => ({
        ...prev,
        eventData: {
          ...prev.eventData,
          filteredEvents: prev.initialEvents,
        },
      }));
};

export const setToday = (initialEvents, setData) => {
  const today = DateTime.now();
  const keys = Object.keys(initialEvents);
  const indexToday = keys.indexOf(
    keys.find(
      (date) =>
        today.diff(
          DateTime.fromFormat(date, "dd.MM.yyyy").setLocale("de"),
          "days"
        ).days < 1
    )
  );

  setData((prev) => ({
    ...prev,
    filters: {
      ...prev.filters,
      currentDate: indexToday >= 0 ? indexToday : 0,
    },
  }));
};
