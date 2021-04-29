import React, { useEffect } from "react";
import { loadEvents, loadTaxonomies, loadVenues } from "../lib/lib";

import CalendarHeader from "./calendarHeader";
import CalendarList from "./calendarList";
import useCalendarContext from "../hooks/useCalendarContext";

const Calendar = () => {
  const { setData, data } = useCalendarContext();

  const { venuesData } = data;

  useEffect(() => {
    loadTaxonomies(setData);
    loadVenues(setData);
  }, [setData]);

  useEffect(() => {
    venuesData !== undefined && loadEvents(setData, venuesData);
  }, [venuesData, setData]);

  return (
    <div className="max-h-screen" style={{ margin: "0 auto" }}>
      <CalendarHeader />
      <CalendarList />
    </div>
  );
};

export default Calendar;
