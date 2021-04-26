import "./assets/style.css";

import React, { useState } from "react";

import Calendar from "./components/calendar";
import { Provider as CalendarContextProvider } from "./hooks/useCalendarContext";

const App = () => {
  const urlParams = new URLSearchParams(window.location.search);

  const [data, setData] = useState({
    eventData: {
      initialEvents: [],
      filteredEvents: [],
    },
    taxonomies: {
      divisions: {
        divisionsNames: [],
        divisionsData: [],
      },
      cities: [],
    },
    filters: {
      division: urlParams.get("saeule") && urlParams.get("saeule"),
      city: urlParams.get("ort") && urlParams.get("ort"),
      currentDate: 0,
    },
  });

  return (
    <CalendarContextProvider
      value={{
        data,
        setData,
      }}
    >
      <Calendar />
    </CalendarContextProvider>
  );
};

export default App;
