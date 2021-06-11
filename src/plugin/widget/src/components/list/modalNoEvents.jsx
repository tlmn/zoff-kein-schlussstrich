import React from "react";
import ResetButton from "../filters/resetButton";

const ModalNoEvents = () => {
  return (
    <div className="fixed w-full flex justify-center border-b-2 bg-black">
      <div className="container grid-6 md:grid-16">
        <div className="col-span-full py-4 px-2 flex flex-col items-center">
          <span className="text-white text-lg text-center font-sans leading-snug">
            Keine Veranstaltungen mit diesen Filtereinstellungen.
          </span>
          <ResetButton />
        </div>
      </div>
    </div>
  );
};

export default ModalNoEvents;
