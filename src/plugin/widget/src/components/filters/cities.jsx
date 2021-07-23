import React from "react";
import useCalendarContext from "../../hooks/useCalendarContext";
import Dropdown from "react-dropdown";
import "react-dropdown/style.css";

const CitiesFilter = () => {
  const { data, setData } = useCalendarContext();

  const {
    taxonomies: { cities },
    filters: { city },
  } = data;

  return (
    <div className="z-50">
      <Dropdown
        options={cities}
        value={city}
        placeholder="Ort auswählen"
        className="select-filter"
        controlClassName="select-filter__control"
        menuClassName="select-filter__menu"
        baseClassName="select-filter__base"
        onChange={(event) => {
          setData((prev) => ({
            ...prev,
            filters: {
              ...prev.filters,
              city: event.value === "alle Orte" ? null : event.value,
              currentDate: 0,
            },
          }));
        }}
      />
    </div>
  );
};

export default CitiesFilter;
