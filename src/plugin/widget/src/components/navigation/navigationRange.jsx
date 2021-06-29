import PropTypes from "prop-types";
import { Range } from "react-range";
import React from "react";
import useCalendarContext from "../../hooks/useCalendarContext";

const NavigationRange = () => {
  const { data, setData } = useCalendarContext();

  const {
    eventData: { filteredEvents },
    filters: { currentDate },
  } = data;

  const filteredDates = Object.keys(filteredEvents);

  return (
    <>
      {filteredDates.length > 1 && (
        <span className="hidden md:block mr-3 font-sans font-normal text-m text-white">
          {filteredDates[0]}
        </span>
      )}
      
      <div className="md:mx-3 w-full">
        <Range
          step={1}
          min={0}
          max={filteredDates.length - 1}
          values={[currentDate]}
          onChange={(value) => {
            filteredDates.length > 1 &&
              setData((prev) => ({
                ...prev,
                filters: {
                  ...prev.filters,
                  currentDate: value,
                },
              }));
          }}
          renderTrack={({ props, children }) => (
            <div
              {...props}
              style={{
                ...props.style,
                height: "2px",
                width: "100%",
                backgroundColor: "#fff",
              }}
            >
              {children}
            </div>
          )}
          renderThumb={({ props }) => (
            <div
              {...props}
              style={{
                ...props.style,
                height: "20px",
                width: "20px",
                backgroundColor: "#0094FF",
                borderRadius: "9999px",
                outline: 0,
              }}
            />
          )}
        />
      </div>

      {filteredDates.length > 1 && (
        <span className="hidden md:block ml-3 font-sans font-normal text-m text-white">
          {filteredDates[filteredDates.length - 1]}
        </span>
      )}
    </>
  );
};

NavigationRange.propTypes = {
  style: PropTypes.object,
};

export default NavigationRange;
