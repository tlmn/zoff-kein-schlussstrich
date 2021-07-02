import React, { useEffect, useRef, useState } from "react";
import { filterEvents, scrollToDate } from "../lib/lib";

import DateSeparator from "./list/dateSeparator";
import EventTeaser from "./eventTeaser";
import LoadingSpinner from "./list/loadingSpinner";
import ModalNoEvents from "./list/modalNoEvents";
import ToTopButton from "./list/toTopButton";
import useCalendarContext from "../hooks/useCalendarContext";

const CalendarList = () => {
  const listRef = useRef(null);

  const { data, setData } = useCalendarContext();

  const [offsetY, setOffsetY] = useState(0);

  const {
    eventData: { filteredEvents, initialEvents },
    filters: { city, division, currentDate },
  } = data;

  const filteredDates = Object.keys(filteredEvents);

  useEffect(() => {
    filterEvents(data, setData);
  }, [division, city]);

  useEffect(() => {
    scrollToDate(filteredDates, currentDate, listRef);
  }, [currentDate]);

  useEffect(() => {
    const updateScrollPosition = () => {
      setOffsetY(listRef.current.scrollTop);
    }
    if (listRef && listRef.current) {
      listRef.current.addEventListener("scroll", updateScrollPosition, false);
      return function cleanup() {
        listRef.current.removeEventListener("scroll", updateScrollPosition, false);
      };
    }
  }, []);

  return (
    <div
      className="max-h-screen overflow-scroll flex flex-col items-center"
      ref={listRef}
    >
      {filteredEvents &&
        Object.keys(filteredEvents).length !== 0 &&
        filteredEvents.constructor === Object &&
        Object.keys(filteredEvents).map((singleKey, index) => (
          <>
            {index !== 0 && <DateSeparator date={singleKey} />}
            <div
              className={`bg-white w-full flex justify-center ${index + 1 < Object.keys(filteredEvents) ? `border-b-2` : ``
                }`}
              id={singleKey.replace(/\./g, "")}
            >
              <div className="container grid-16">
                <div className="col-span-full grid-6 md:grid-16 md:border-l-2 md:border-r-2">
                  {filteredEvents[singleKey].map((event, index) => (
                    <EventTeaser
                      {...event}
                      key={`eventTeaser-${singleKey}-${index}`}
                      borderBottom={
                        index + 1 < filteredEvents[singleKey].length
                          ? true
                          : false
                      }
                    />
                  ))}
                </div>
              </div>
            </div>
          </>
        ))}

      {filteredEvents &&
        Object.keys(filteredEvents).length < 1 &&
        initialEvents.length !== 0 && <ModalNoEvents />}

      {initialEvents.length === 0 && <LoadingSpinner />}
      {initialEvents.length !== 0 && offsetY > 300 && <ToTopButton listRef={listRef} />}
    </div>
  );
};

export default CalendarList;
