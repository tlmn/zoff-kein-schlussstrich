import ArrowCircle from "../../assets/icons/arrowCircle";
import ArrowCircleSmall from "../../assets/icons/arrowCircle--small";
import PropTypes from "prop-types";
import React from "react";
import useCalendarContext from "../../hooks/useCalendarContext";

const NavigationArrows = ({ type = "prev" }) => {
  const { data, setData } = useCalendarContext();

  const {
    eventData: { filteredEvents },
    filters: { currentDate },
  } = data;

  const isDisabled = () => {
    return (type === "prev" && currentDate > 0) ||
      (type === "next" && currentDate < filteredDates.length - 1)
      ? false
      : true;
  };

  const filteredDates = Object.keys(filteredEvents);

  return (
    <button
      onClick={() =>
        setData((prev) => ({
          ...prev,
          filters: {
            ...prev.filters,
            currentDate:
              type === "prev"
                ? parseInt(prev.filters.currentDate) - 1
                : parseInt(prev.filters.currentDate) + 1,
          },
        }))
      }
      style={{ outline: 0 }}
      disabled={isDisabled()}
      className="hover:fill--blue"
    >
      <ArrowCircle
        strokeColor={isDisabled() ? `#fff` : `#000`}
        style={{ transform: type === "prev" ? `` : `rotate(180deg)` }}
        className="hidden md:block"
        isDisabled={isDisabled()}
      />
      <ArrowCircleSmall
        strokeColor={isDisabled() ? `#fff` : `#000`}
        style={{ transform: type === "prev" ? `` : `rotate(180deg)` }}
        className="block md:hidden"
        isDisabled={isDisabled()}
      />
    </button>
  );
};

NavigationArrows.propTypes = {
  type: PropTypes.string,
};

export default NavigationArrows;
