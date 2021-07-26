import React from "react";
import useCalendarContext from "../../hooks/useCalendarContext";
import Filter from "./filter";
import { removeFalsy } from "../../lib/lib";

const CitiesFilter = () => {
  const { data, setData } = useCalendarContext();

  const {
    taxonomies: { cities },
    filters: { city },
  } = data;
  
  return (
    <Filter
      options={removeFalsy(cities)}
      value={city}
      placeholder="Ort auswählen"
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
  );
};

export default CitiesFilter;
