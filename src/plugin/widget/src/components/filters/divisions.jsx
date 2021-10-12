import React from "react";
import useCalendarContext from "../../hooks/useCalendarContext";
import Filter from "./filter";
import { withNamespaces } from "react-i18next";
import PropTypes from "prop-types";

const DivisionsFilter = ({ t }) => {
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
      placeholder={t("filters.divisions.allDivisions")}
      onChange={(event) => {
        setData((prev) => ({
          ...prev,
          filters: {
            ...prev.filters,
            division:
              event.value === t("filters.divisions.allDivisions")
                ? null
                : divisions.filter((item) => item.name === event.value)[0].id,
            currentDate: 0,
          },
        }));
      }}
    />
  );
};

DivisionsFilter.propTypes = {
  t: PropTypes.func,
};

export default withNamespaces()(DivisionsFilter);
