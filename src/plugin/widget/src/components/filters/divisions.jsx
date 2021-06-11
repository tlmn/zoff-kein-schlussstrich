import React from "react";
import useCalendarContext from "../../hooks/useCalendarContext";

const DivisionsFilter = () => {
  const { data, setData } = useCalendarContext();

  const {
    taxonomies: {
      divisions: { divisions, divisionsNames },
    },
    filters: { division },
  } = data;

  return (
    <div className="select">
      <select
        onChange={(event) => {
          setData((prev) => ({
            ...prev,
            filters: {
              ...prev.filters,
              division:
                event.target.value === "alle Säulen"
                  ? null
                  : divisions.filter(
                      (item) => item.name === event.target.value
                    )[0].id,
              currentDate: 0,
            },
          }));
        }}
        className=" text-black"
        style={{ outline: 0 }}
        value={division !== null ? divisions[division] : `alle Säulen`}
      >
        {divisionsNames.map(
          (item, index) =>
            item !== "" && (
              <option value={item} key={index}>
                {item}
              </option>
            )
        )}
      </select>
    </div>
  );
};

export default DivisionsFilter;
