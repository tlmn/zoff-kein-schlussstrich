import CalendarHeader from "./calendarHeader";
import CalendarList from "./calendarList";
import React from "react";

const Calendar = () => (
  <div className="max-h-screen" style={{ margin: "0 auto" }}>
    <CalendarHeader />
    <CalendarList />
  </div>
);

export default Calendar;
