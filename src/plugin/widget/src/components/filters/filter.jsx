import React from "react";
import PropTypes from "prop-types";
import Dropdown from "react-dropdown";

const Filter = ({ options, value, onChange, placeholder }) => (
  <Dropdown
    options={options}
    value={value}
    className="select-filter"
    controlClassName="select-filter__control"
    menuClassName="select-filter__menu"
    baseClassName="select-filter__base"
    arrowClosed={<span className="select-filter__arrow-closed" />}
    arrowOpen={<span className="select-filter__arrow-open" />}
    placeholder={placeholder}
    onChange={onChange}
  />
);

Filter.propTypes = {
  options: PropTypes.array,
  value: PropTypes.string,
  onChange: PropTypes.func,
  placeholder: PropTypes.string,
};

export default Filter;
