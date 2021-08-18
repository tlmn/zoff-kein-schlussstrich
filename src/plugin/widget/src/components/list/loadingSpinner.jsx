import KSLogo from "../../assets/icons/ks-logo";
import React from "react";
import { withNamespaces } from "react-i18next";
import PropTypes from "prop-types";

const LoadingSpinner = ({ t }) => (
  <div className="w-full flex justify-center border-b-2">
    <div className="container grid-6 md:grid-16 bg-black">
      <div className="col-span-full py-4 px-2 flex flex-col items-center">
        <span className="text-white text-lg font-sans">
          {t("common.loading")}
        </span>
        <KSLogo className="calendar__loading-spinner" />
      </div>
    </div>
  </div>
);

LoadingSpinner.propTypes = {
  t: PropTypes.func,
};

export default withNamespaces()(LoadingSpinner);
