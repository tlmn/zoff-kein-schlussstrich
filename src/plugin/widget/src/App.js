import "./assets/style.css";
import "./assets/select.css";

import React, { useState } from "react";
import Cookies from "js-cookie";
import Calendar from "./components/calendar";
import "./i18n";
import { Provider as CalendarContextProvider } from "./hooks/useCalendarContext";

const App = () => {
  const [data, setData] = useState({
    currentLocale: ["de", "en", "dels"].includes(
      Cookies.get("wp-wpml_current_language")
    )
      ? Cookies.get("wp-wpml_current_language")
      : `de`,
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
