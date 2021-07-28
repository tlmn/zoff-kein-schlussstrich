import React, { useEffect } from "react";
import { loadEvents, loadDivisions, loadVenues } from "../lib/lib";

import CalendarHeader from "./calendarHeader";
import CalendarList from "./calendarList";
import useCalendarContext from "../hooks/useCalendarContext";

const Calendar = () => {
  const { setData, data } = useCalendarContext();

  const { venuesData, calendarRef } = data;

  useEffect(() => {
    loadDivisions(setData);
    loadVenues(setData);
  }, []);

  useEffect(() => {
    venuesData !== undefined && loadEvents(setData, venuesData, data);
  }, [venuesData]);

  return (
    <div style={{ margin: "0 auto" }} ref={calendarRef}>
      <CalendarHeader />
      <CalendarList />
    </div>
  );
};

export default Calendar;
