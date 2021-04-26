import { concat, remove } from "lodash";

import jsonata from "jsonata";

export const generateLink = (link, datetime) => {
  let date = new Date(datetime);

  return `${link}?date=${pad(date.getUTCDate(), 2)}${pad(
    date.getMonth() + 1,
    2
  )}${date.getFullYear()}&time=${pad(date.getHours(), 2)}${pad(
    date.getMinutes(),
    2
  )}`;
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

export const getTime = (datetime) => {
  let date = new Date(datetime);
  return `${pad(date.getHours(), 2)}:${pad(date.getMinutes(), 2)}`;
};

export const pad = (num, size) => {
  num = num.toString();
  while (num.length < size) num = "0" + num;
  return num;
};

export const getWeekDay = (dateLong) => {
  const weekDays = [
    "Sonntag",
    "Montag",
    "Dienstag",
    "Mittwoch",
    "Donnerstag",
    "Freitag",
    "Samstag",
  ];

  let dateElements = dateLong.split(".");
  let dateLongFormatted =
    dateElements[2] +
    "-" +
    pad(parseInt(dateElements[1]), 2) +
    "-" +
    pad(parseInt(dateElements[0]), 2);

  let date = new Date(dateLongFormatted);

  return weekDays[date.getDay()];
};

const getShortDate = (datetime) => {
  let date = new Date(datetime);

  return `${date.getUTCDate()}.${date.getMonth() + 1}.`;
};

const getLongDate = (datetime) => {
  let date = new Date(datetime);
  return `${date.getUTCDate()}.${date.getMonth() + 1}.${date.getFullYear()}`;
};

export const parseEvents = (eventsRaw) => {
  let eventsParsed = [];

  typeof eventsRaw != undefined &&
    eventsRaw.map((item) =>
      item.acf.meta.occurences.map(
        (occ) =>
          occ.show_in_calendar === true &&
          eventsParsed.push({
            alarm: occ.alarm,
            city: occ.city,
            dateLong: getLongDate(new Date(occ.timestamp)),
            dateShort: getShortDate(new Date(occ.timestamp)),
            datetime: convertToDate(new Date(occ.timestamp)),
            division: item.division.length !== 0 ? item.division[0] : 0,
            duration: item.duration,
            feature_image: item.acf.meta.feature_image,
            link: generateLink(item.link, new Date(occ.timestamp).toJSON()),
            short_description: item.acf.meta.short_description,
            ticketlink: occ.ticketlink,
            time: getTime(new Date(occ.timestamp)),
            timestamp: new Date(occ.timestamp).toJSON(),
            title: item.title.rendered,
            venue: occ.venue,
          })
      )
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

export const loadEvents = async (setData) => {
  const response = await fetch(
    "http://b9zba9k.myraidbox.de/wp-json/wp/v2/event?_fields=acf,link,title,division,labels"
  );

  if (!response.ok) {
    return;
  }

  const WPevents = await response.json();
  const parsedWPEvents = parseEvents(WPevents);
  const filterExpressionCities = jsonata(`$sort($distinct(*.city))`);

  setData((prev) => ({
    ...prev,
    eventData: {
      initialEvents: parsedWPEvents,
      filteredEvents: parsedWPEvents,
    },
    taxonomies: {
      ...prev.taxonomies,
      cities: concat(
        "alle Orte",
        filterExpressionCities.evaluate(parsedWPEvents).filter((item) => {
          return item !== "";
        })
      ),
    },
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

export const loadTaxonomies = async (setData) => {
  const response = await fetch(
    "http://b9zba9k.myraidbox.de/wp-json/wp/v2/division?_fields=id,name"
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
        divisions: concat({ id: 0, name: "alle Säulen" }, WPDivisions),
        divisionsNames: concat(
          "alle Säulen",
          filterDivisionNames.evaluate(WPDivisions)
        ),
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