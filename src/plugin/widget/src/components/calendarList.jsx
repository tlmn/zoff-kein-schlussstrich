import React, { useEffect, useRef } from "react";
import { filterEvents, scrollToDate } from "../lib/lib";

import EventTeaser from "./eventTeaser";
import useCalendarContext from "../hooks/useCalendarContext";

const CalendarList = () => {
  const listRef = useRef();

  const { data, setData } = useCalendarContext();

  const {
    eventData: { filteredEvents },
    filters: { city, division, currentDate },
  } = data;

  const filteredDates = Object.keys(filteredEvents);

  useEffect(() => {
    filterEvents(data, setData);
  }, [division, city]);

  useEffect(() => {
    scrollToDate(filteredDates, currentDate, listRef);
  }, [currentDate]);

  return (
    <div
      className="max-h-screen overflow-scroll bg-black flex flex-col items-center"
      ref={listRef}
    >
      {filteredEvents &&
        Object.keys(filteredEvents).length !== 0 &&
        filteredEvents.constructor === Object &&
        Object.keys(filteredEvents).map((key, index) => (
          <>
            {index > 0 && (
              <div className="container grid-16 border-b-2 bg-white">
                <div className="col-span-full flex justify-center bg-black">
                  <h2
                    className="font-sans font-normal text-6xl md:text-7xl text-white"
                    style={{
                      marginTop: "-2px",
                      lineHeight: 0.7,
                    }}
                  >
                    {key.slice(0, -4)}
                  </h2>
                </div>
              </div>
            )}
            <div
              className={`bg-white w-full flex justify-center ${
                index + 1 < Object.keys(filteredEvents) ? `border-b-2` : ``
              }`}
            >
              <div className="container grid-16" id={key.replace(/\./g, "")}>
                <div className="col-span-full grid-6 md:grid-16">
                  {filteredEvents[key].map((event, index) => (
                    <EventTeaser {...event} key={index} />
                  ))}
                </div>
              </div>
            </div>
          </>
        ))}
      {filteredEvents && Object.keys(filteredEvents).length < 1 && (
        <div className="w-full grid-6 md:grid-16 border-b-2 bg-black">
          <div className="col-span-full py-4 px-2">
            <span className="text-white">
              keine Veranstaltungen mit diesen Filtern
            </span>
          </div>
        </div>
      )}
      {!filteredEvents && `lade`}
    </div>
  );
};

export default CalendarList;
