import React from "react";
import useCalendarContext from "../../hooks/useCalendarContext";

const CitiesFilter = () => {
  const { data, setData } = useCalendarContext();

  const {
    taxonomies: { cities },
    filters: { city },
  } = data;

  return (
    <div className="select__wrapper">
      <select
        onChange={(event) => {
          setData((prev) => ({
            ...prev,
            filters: {
              ...prev.filters,
              city:
                event.target.value === "alle Orte" ? null : event.target.value,
              currentDate: 0,
            },
          }));
        }}
        className="text-black text-center"
        style={{ outline: 0 }}
      >
        {cities.map(
          (item, index) =>
            item !== "" && (
              <option
                value={item}
                selected={item === "alle Orte" && city === null}
                key={index}
              >
                {item}
              </option>
            )
        )}
      </select>
    </div>
  );
};

export default CitiesFilter;
