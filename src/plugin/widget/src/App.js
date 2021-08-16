import "./assets/style.css";
import "./assets/select.css";

import React, { useState } from "react";
import Cookies from "js-cookie";

import Calendar from "./components/calendar";
import { Provider as CalendarContextProvider } from "./hooks/useCalendarContext";

const App = () => {
  const [data, setData] = useState({
    currentLanguage: Cookies.get("wp-wpml_current_language"),
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
      division: null,
      city: null,
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
