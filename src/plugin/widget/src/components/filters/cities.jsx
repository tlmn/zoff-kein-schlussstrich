import React from "react";
import useCalendarContext from "../../hooks/useCalendarContext";

const CitiesFilter = () => {
  const { data, setData } = useCalendarContext();

  const {
    taxonomies: { cities },
    filters: { city },
  } = data;
  
  return (
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
      className="my-1 mx-2 bg-lightGray rounded-full p-1 text-black calendar__select"
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
  );
};

export default CitiesFilter;
