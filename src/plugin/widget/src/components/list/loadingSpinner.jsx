import KSLogo from "../../assets/icons/ks-logo";
import React from "react";

const LoadingSpinner = () => (
  <div className="w-full flex justify-center border-b-2 bg-black">
    <div className="container grid-6 md:grid-16">
      <div className="col-span-full py-4 px-2 flex flex-col items-center">
        <span className="text-white text-lg font-sans">Lade Kalender</span>
        <KSLogo className="calendar__loading-spinner" />
      </div>
    </div>
  </div>
);

export default LoadingSpinner;
