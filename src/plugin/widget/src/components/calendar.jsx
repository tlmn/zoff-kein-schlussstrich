import React, { useEffect } from "react";
import {
  loadEvents,
  loadDivisions,
  loadVenues,
  loadLabels,
  setToday,
} from "../lib/lib";

import CalendarHeader from "./calendarHeader";
import CalendarList from "./calendarList";
import useCalendarContext from "../hooks/useCalendarContext";

const Calendar = () => {
  const { setData, data } = useCalendarContext();

  const {
    eventData: { initialEvents },
  } = data;

  const { venuesData, calendarRef } = data;

  useEffect(() => {
    loadDivisions(setData);
    loadLabels(setData);
    loadVenues(setData);
  }, []);

  useEffect(() => setToday(initialEvents, setData), [initialEvents]);

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
