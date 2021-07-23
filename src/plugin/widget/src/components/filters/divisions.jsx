import React from "react";
import useCalendarContext from "../../hooks/useCalendarContext";
import Dropdown from "react-dropdown";


const DivisionsFilter = () => {
  const { data, setData } = useCalendarContext();

  const {
    taxonomies: {
      divisions: { divisions, divisionsNames },
    },
    filters: { division },
  } = data;

  return (
    <div className="relative z-50">
      <Dropdown
        options={divisionsNames}
        value={divisionsNames[division]}
        className="select-filter"
        controlClassName="select-filter__control"
        menuClassName="select-filter__menu"
        baseClassName="select-filter__base"
        placeholder="Säule auswählen"
        onChange={(event) => {
          setData((prev) => ({
            ...prev,
            filters: {
              ...prev.filters,
              division:
                event.value === "alle Säulen"
                  ? null
                  : divisions.filter((item) => item.name === event.value)[0].id,
              currentDate: 0,
            },
          }));
        }}
      />
    </div>
  );
};

export default DivisionsFilter;
