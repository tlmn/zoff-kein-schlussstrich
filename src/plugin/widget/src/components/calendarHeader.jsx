import "react-dropdown/style.css";

import CitiesFilter from "./filters/cities";
import DivisionsFilter from "./filters/divisions";
import FilterIcon from "../assets/icons/filter";
import NavigationArrows from "./navigation/navigationArrows";
import NavigationRange from "./navigation/navigationRange";
import PropTypes from "prop-types";
import React from "react";
import ResetButton from "./filters/resetButton";
import { getWeekDay } from "../lib/lib";
import useCalendarContext from "../hooks/useCalendarContext";

export const CalendarHeader = () => {
  const { data } = useCalendarContext();

  const {
    eventData: { filteredEvents },
    filters: { currentDate },
  } = data;

  const filteredDates = Object.keys(filteredEvents);

  return (
    <div
      className="relative z-30 font-medium"
    >
      <div
        className="container grid-6 md:grid-16"
        style={{ margin: "0 auto" }}
      >
        <div className="col-span-full z-50 grid-6 md:grid-16 py-2 bg-black">
          <div className="col-span-full flex justify-center md:hidden">
            <span className="block font-sans text-white text-m leading-snug">
              {filteredDates[currentDate] !== undefined &&
                getWeekDay(filteredDates[currentDate])}
            </span>
          </div>
          <div className="px-2 col-span-full md:col-span-12 md:col-start-3 w-full flex flex-col justify-center bg-black">
            <div className="flex justify-between w-full">
              <NavigationArrows type="prev" />
              <div className="flex items-center">
                <span
                  className="hidden md:inline-block font-sans font-normal text-white text-m leading-snug"
                  style={{ transform: "rotate(270deg)" }}
                >
                  {filteredDates[currentDate] !== undefined &&
                    getWeekDay(filteredDates[currentDate])}
                </span>
                <span className="font-sans text-5xl md:text-7xl font-normal text-white leading-none">
                  {filteredDates[currentDate] !== undefined
                    ? filteredDates[currentDate].slice(0, -4)
                    : `– . –`}
                </span>
              </div>
              <NavigationArrows type="next" />
            </div>
            <div className="hidden md:flex items-center">
              {filteredDates.length > 1 && <NavigationRange className="md:mx-3 w-full" />}
            </div>
          </div>
        </div>
      </div>

      <div
        className="container grid-6 md:grid-16 shadow--bottom pt-3 pb-2 md:py-3 md:border-l-2 md:border-r-2"
      >
        <div
          className="col-span-6 md:hidden flex flex-col py-3 px-2 relative shadow--bottom"
        >
          {filteredDates.length > 1 && <NavigationRange controlsColor="#000" className="md:mx-3 w-full p-2 px-4" />}
          <div className="flex justify-between mt-2">
            {filteredDates.length > 1 && (
              <>
                <span className="font-sans text-xs">
                  {filteredDates[0]}
                </span>
                <span className="font-sans text-xs">
                  {filteredDates[filteredDates.length - 1]}
                </span>
              </>
            )}
          </div>
        </div>
        <div className="px-2 py-3 col-span-full flex justify-center">
          <div className="flex items-center gap-3 flex-wrap md:flex-nowrap">
            <FilterIcon style={{ height: "2rem" }} />
            <CitiesFilter />
            <DivisionsFilter />
            <ResetButton />
          </div>
        </div>
      </div>
    </div>
  );
};

CalendarHeader.propTypes = {
  style: PropTypes.object,
};

export default CalendarHeader;
