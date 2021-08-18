import React from "react";
import ResetButton from "../filters/resetButton";
import useCalendarContext from "../../hooks/useCalendarContext";
import { withNamespaces } from "react-i18next";
import PropTypes from "prop-types";

const ModalNoEvents = ({ t }) => {
  const { setData } = useCalendarContext();

  return (
    <div
      className="fixed z-50 w-full h-full flex items-center border-b-2 bg-black bg-opacity-50 top-0 left-0"
      style={{ backdropFilter: "blur(3px)" }}
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
    >
      <div className="container grid-6 md:grid-16">
        <div className="col-span-full md:col-span-8 md:col-start-5 bg-black p-5 mx-5 flex flex-col items-center rounded-md shadow--bottom-right">
          <span className="text-white text-lg text-center font-sans leading-snug mb-3">
            {t("filters.noResults")}
          </span>
          <ResetButton />
        </div>
      </div>
    </div>
  );
};

ModalNoEvents.propTypes = {
  t: PropTypes.func,
};

export default withNamespaces()(ModalNoEvents);
