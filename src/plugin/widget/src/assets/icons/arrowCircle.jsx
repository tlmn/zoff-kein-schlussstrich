import PropTypes from "prop-types";
import React from "react";

const ArrowCircle = ({ strokeColor = "#000", ...props }) => (
  <svg
    width="56"
    height="56"
    viewBox="0 0 56 56"
    fill="none"
    xmlns="http://www.w3.org/2000/svg"
    {...props}
  >
    <circle cx="28" cy="28" r="28" transform="rotate(90 28 28)" fill="#fff" />
    <line x1="45" y1="28" x2="14" y2="28" stroke={strokeColor} strokeWidth={2} />
    <line
      x1="23.7071"
      y1="17.7071"
      x2="12.7071"
      y2="28.7071"
      stroke={strokeColor}
      strokeWidth={2}
    />
    <line
      x1="12.7071"
      y1="27.2929"
      x2="23.7071"
      y2="38.2929"
      stroke={strokeColor}
      strokeWidth={2}
    />
  </svg>
);

ArrowCircle.propTypes = {
  strokeColor: PropTypes.string,
};

export default ArrowCircle;
