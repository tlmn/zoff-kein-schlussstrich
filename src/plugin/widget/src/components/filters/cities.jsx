import React from "react";
import useCalendarContext from "../../hooks/useCalendarContext";
import Filter from "./filter";
import { withNamespaces } from "react-i18next";
import PropTypes from "prop-types";

const CitiesFilter = ({ t }) => {
  const { data, setData } = useCalendarContext();

  const {
    taxonomies: { cities },
    filters: { city },
  } = data;

  return (
    <Filter
      options={cities.filter((item) => item)}
      value={city}
      placeholder={t("filters.cities.allCities")}
      onChange={(event) => {
        setData((prev) => ({
          ...prev,
          filters: {
            ...prev.filters,
            city:
              event.value === t("filters.cities.allCities")
                ? null
                : event.value,
            currentDate: 0,
          },
        }));
      }}
    />
  );
};

CitiesFilter.propTypes = {
  t: PropTypes.func,
};

export default withNamespaces()(CitiesFilter);
