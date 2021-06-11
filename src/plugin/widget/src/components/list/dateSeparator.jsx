import PropTypes from "prop-types";
import React from "react";

const DateSeparator = ({ date }) => {
  return (
    <div className="container grid-16 bg-white">
      <div className="col-span-full flex justify-center bg-black">
        <h2
          className="font-sans font-normal text-6xl md:text-7xl text-white z-10"
          style={{
            marginTop: "-2px",
            lineHeight: 0.7,
          }}
        >
          {date.slice(0, -4)}
        </h2>
      </div>
    </div>
  );
};

DateSeparator.propTypes = {
  date: PropTypes.string,
};

export default DateSeparator;
