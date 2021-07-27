import React from "react";
import useCalendarContext from "../../hooks/useCalendarContext";
import Filter from "./filter";

const DivisionsFilter = () => {
  const { data, setData } = useCalendarContext();

  const {
    taxonomies: {
      divisions: { divisions, divisionsNames },
    },
    filters: { division },
  } = data;

  return (
    <Filter
      options={divisionsNames}
      value={
        typeof divisions !== undefined &&
        divisions?.filter((item) => item.id === division)[0]?.name
      }
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
  );
};

export default DivisionsFilter;
