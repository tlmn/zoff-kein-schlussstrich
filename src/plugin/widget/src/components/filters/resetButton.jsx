import React from "react";
import PropTypes from "prop-types";
import useCalendarContext from "../../hooks/useCalendarContext";

import { withNamespaces } from "react-i18next";

const ResetButton = ({ t }) => {
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
      {t('filters.reset')}
    </button>
  );
};

ResetButton.propTypes = {
  t: PropTypes.func,
};

export default withNamespaces()(ResetButton);
