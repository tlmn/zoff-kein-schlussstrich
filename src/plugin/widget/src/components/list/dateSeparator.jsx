import { DateTime } from "luxon";
import PropTypes from "prop-types";
import React from "react";
import { getWeekDay } from "../../lib/lib";

const DateSeparator = ({ date }) => {
  const luxon = DateTime.fromFormat(date, "dd.MM.yyyy").setLocale("de");
  return (
    <div className="container grid-16 bg-white">
      <div className="col-span-full flex flex-col items-center md:justify-center md:flex-row bg-black text-white">
        <span
          className="hidden md:inline-block font-sans text-white text-base leading-snug"
          style={{ transform: "rotate(270deg)" }}
        >
          {getWeekDay(date)}
        </span>

        <span
          className="block md:hidden font-sans text-white text-base leading-snug my-2"
        >
          {getWeekDay(date)}
        </span>

        <h2
          className="font-sans font-normal text-6xl md:text-7xl z-10"
          style={{
            marginTop: "-2px",
            lineHeight: 0.7,
          }}
        >
          {luxon.toFormat("dd.MM.")}
        </h2>
      </div>
    </div>
  );
};

DateSeparator.propTypes = {
  date: PropTypes.string,
};

export default DateSeparator;
