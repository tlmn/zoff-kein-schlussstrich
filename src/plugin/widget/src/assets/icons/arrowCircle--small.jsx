import PropTypes from "prop-types";
import React from "react";

const ArrowCircleSmall = ({ strokeColor = "#000", isDisabled = false, ...props }) => (
  <svg width={32} height={32} viewBox={"0 0 32 32"} fill={"none"} {...props}>
    {!isDisabled &&
      <>
        <circle cx={16} cy={16} r={16} transform={"rotate(90 16 16)"} fill="#fff" />
        <path d={"M7.71289 16L24.2843 16"} stroke={strokeColor} strokeWidth={2} />
        <line
          x1={13.8497}
          y1={10.4213}
          x2={7.56397}
          y2={16.7071}
          stroke={strokeColor}
          strokeWidth={2}
        />
        <line
          x1={7.56453}
          y1={15.2929}
          x2={13.8502}
          y2={21.5786}
          stroke={strokeColor}
          strokeWidth={2}
        />
      </>}
  </svg>
);

ArrowCircleSmall.propTypes = {
  strokeColor: PropTypes.string,
  isDisabled: PropTypes.boolean,
};

export default ArrowCircleSmall;
