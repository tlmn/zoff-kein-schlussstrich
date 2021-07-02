import ArrowCircle from "../../assets/icons/arrowCircle";
import PropTypes from "prop-types";
import React from "react";

const ToTopButton = ({ listRef }) => {
    const handleClick = () => {
        listRef.current.scrollTop = 0;
        window.scrollTo(0, 0);
    }
    return (
        <button type="button" className="fixed bottom-0 right-0 z-20 m-2 hover:fill--blue" onClick={() => handleClick()}>
            <ArrowCircle
                strokeColor="#fff"
                backgroundColor="#000"
                style={{ transform: `rotate(90deg)` }}
            />
        </button>)
};

export default ToTopButton;

ToTopButton.propTypes = {
    listRef: PropTypes.object,
};