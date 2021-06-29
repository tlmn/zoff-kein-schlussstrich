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
      style={{ boxShadow: "0px 8px 10px rgba(0, 0, 0, 0.25)" }}
      className="relative z-20"
    >
      <div className="bg-black">
        <div
          className="container grid-6 md:grid-16"
          style={{ margin: "0 auto" }}
        >
          <div className="col-span-full z-50 grid-6 md:grid-16 py-2">
            <div className="col-span-full flex justify-center md:hidden">
              <span className="block font-sans text-white text-m leading-snug">
                {filteredDates[currentDate] !== undefined &&
                  getWeekDay(filteredDates[currentDate])}
              </span>
            </div>
            <div className="px-2 pb-2 col-span-full md:col-span-12 md:col-start-3 w-full flex flex-col justify-center bg-black">
              <div className="flex justify-between w-full">
                <NavigationArrows type="prev" />
                <div className="flex items-center">
                  <span
                    className="hidden md:inline-block font-sans text-white text-m leading-snug"
                    style={{ transform: "rotate(270deg)" }}
                  >
                    {filteredDates[currentDate] !== undefined &&
                      getWeekDay(filteredDates[currentDate])}
                  </span>
                  <span className="font-sans font-normal text-5xl md:text-7xl text-white leading-none">
                    {filteredDates[currentDate] !== undefined
                      ? filteredDates[currentDate].slice(0, -4)
                      : `– . –`}
                  </span>
                </div>
                <NavigationArrows type="next" />
              </div>
              <div className="flex items-center">
                {filteredDates.length > 1 && <NavigationRange />}
              </div>
            </div>
          </div>
        </div>
      </div>

      <div className="bg-white pt-3 pb-2 md:py-3">
        <div
          className="container grid-6 md:grid-16"
          style={{ margin: "0 auto" }}
        >
          <div
            className="col-span-6 md:hidden flex justify-between my-2 px-2 relative"
            style={{ boxShadow: "0px 4px 4px rgba(0, 0, 0, 0.25)" }}
          >
            {filteredDates.length > 1 && (
              <>
                <span className="font-sans font-normal text-m">
                  {filteredDates[0]}
                </span>
                <span className="font-sans font-normal text-m">
                  {filteredDates[filteredDates.length - 1]}
                </span>
              </>
            )}
          </div>
          <div className="px-2 col-span-full flex justify-center">
            <div className="flex items-center gap-3">
              <FilterIcon style={{ width: "90px" }} />
              <CitiesFilter />
              <DivisionsFilter />
              <ResetButton />
            </div>
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
