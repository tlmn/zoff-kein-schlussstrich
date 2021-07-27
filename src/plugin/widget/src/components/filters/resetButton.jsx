import React from "react";
import useCalendarContext from "../../hooks/useCalendarContext";

const ResetButton = () => {
  const { data, setData } = useCalendarContext();

  const {
    filters: { city, division },
  } = data;

  return (
    <button
      className={`wp-block-button wp-block-button--${
        division !== null || city !== null ? `yellow` : `disabled`
      } whitespace-nowrap`}
      onClick={() =>
        setData((prev) => ({
          ...prev,
          filters: {
            ...prev.filters,
            division: null,
            city: null,
          },
        }))
      }
      style={{ outline: 0 }}
      type="button"
      disabled={division !== null || city !== null ? false : true}
    >
      zurücksetzen
    </button>
  );
};

export default ResetButton;
