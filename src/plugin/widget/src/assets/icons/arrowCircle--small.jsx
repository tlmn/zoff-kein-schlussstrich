import PropTypes from "prop-types";
import React from "react";

const ArrowCircleSmall = ({ fillColor = "#fff", ...props }) => (
  <svg width={32} height={32} viewBox={"0 0 32 32"} fill={"none"} {...props}>
    <circle cx={16} cy={16} r={16} fill={fillColor} />
    <line
      x1={6.28613}
      y1={15.5715}
      x2={24.0004}
      y2={15.5715}
      stroke={"#000"}
      strokeWidth={2}
    />
    <line
      x1={18.1503}
      y1={21.5787}
      x2={24.436}
      y2={15.2929}
      stroke={"#000"}
      strokeWidth={2}
    />
    <line
      x1={24.4364}
      y1={16.7071}
      x2={18.1507}
      y2={10.4214}
      stroke={"#000"}
      strokeWidth={2}
    />
  </svg>
);

ArrowCircleSmall.propTypes = {
  fillColor: PropTypes.string,
};

export default ArrowCircleSmall;
