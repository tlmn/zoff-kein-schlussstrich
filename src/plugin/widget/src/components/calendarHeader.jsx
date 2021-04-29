import "react-dropdown/style.css";

import ArrowCircle from "../assets/icons/arrowCircle";
import Filter from "../assets/icons/filter";
import { Range } from "react-range";
import React from "react";
import { getWeekDay } from "../lib/lib";
import useCalendarContext from "../hooks/useCalendarContext";

export const CalendarHeader = () => {
  const { data, setData } = useCalendarContext();

  const {
    eventData: { filteredEvents },
    taxonomies: {
      divisions: { divisions, divisionsNames },
      cities,
    },
    filters: { currentDate, city, division },
  } = data;

  const filteredDates = Object.keys(filteredEvents);

  return (
    <div
      style={{ boxShadow: "0px 8px 10px rgba(0, 0, 0, 0.25)" }}
      className="relative z-20"
    >
      {divisions !== [] && (
        <>
          <div className="bg-black">
            <div
              className="container grid-6 md:grid-16"
              style={{ margin: "0 auto" }}
            >
              <div className="col-span-full z-50 grid-6 md:grid-16 py-2">
                <div className="col-span-full flex justify-center md:hidden">
                  <span
                    className="block font-sans text-white text-m leading-snug"
                  >
                    {filteredDates[currentDate] !== undefined &&
                      getWeekDay(filteredDates[currentDate])}
                  </span>
                </div>
                <div className="px-2 pb-2 col-span-full md:col-span-12 md:col-start-3 w-full flex justify-between items-center bg-black">
                  {filteredDates.length > 1 ? (
                    <button
                      onClick={() =>
                        currentDate > 0 &&
                        setData((prev) => ({
                          ...prev,
                          filters: {
                            ...prev.filters,
                            currentDate: parseInt(prev.filters.currentDate) - 1,
                          },
                        }))
                      }
                      style={{ outline: 0 }}
                    >
                      <ArrowCircle
                        fillColor={currentDate > 0 ? `#fff` : `#ccc`}
                      />
                    </button>
                  ) : (
                    <button style={{ outline: 0 }}>
                      <ArrowCircle fillColor="#ccc" />
                    </button>
                  )}

                  <div className="flex items-center">
                    <span
                      className="hidden md:inline-block font-sans text-white text-m leading-snug"
                      style={{ transform: "rotate(270deg)" }}
                    >
                      {filteredDates[currentDate] !== undefined &&
                        getWeekDay(filteredDates[currentDate])}
                    </span>
                    <span className="font-sans font-normal text-xl md:text-7xl text-white leading-none">
                      {filteredDates[currentDate] !== undefined
                        ? filteredDates[currentDate].slice(0, -4)
                        : `– . –`}
                    </span>
                  </div>

                  {filteredDates.length > 1 ? (
                    <button
                      onClick={() =>
                        currentDate < filteredDates.length - 1 &&
                        setData((prev) => ({
                          ...prev,
                          filters: {
                            ...prev.filters,
                            currentDate: parseInt(prev.filters.currentDate) + 1,
                          },
                        }))
                      }
                      style={{ outline: 0 }}
                    >
                      <ArrowCircle
                        style={{ transform: "rotate(180deg)" }}
                        fillColor={
                          currentDate < filteredDates.length - 1
                            ? `#fff`
                            : `#ccc`
                        }
                      />
                    </button>
                  ) : (
                    <button style={{ outline: 0 }}>
                      <ArrowCircle
                        style={{ transform: "rotate(180deg)" }}
                        fillColor="#ccc"
                      />
                    </button>
                  )}
                </div>
              </div>
            </div>
          </div>

          <div className="bg-white pt-3 pb-2 md:py-3">
            <div
              className="container grid-6 md:grid-16"
              style={{ margin: "0 auto" }}
            >
              <div className="col-start-2 col-span-4 md:col-span-8 flex items-center bg-white">
                {filteredDates.length > 1 ? (
                  <>
                    <span className="hidden md:block mr-3 font-sans font-normal text-m">
                      {filteredDates[0]}
                    </span>
                    <Range
                      step={1}
                      min={0}
                      max={filteredDates.length - 1}
                      values={[currentDate]}
                      onChange={(value) => {
                        setData((prev) => ({
                          ...prev,
                          filters: {
                            ...prev.filters,
                            currentDate: value,
                          },
                        }));
                      }}
                      renderTrack={({ props, children }) => (
                        <div
                          {...props}
                          style={{
                            ...props.style,
                            height: "2px",
                            width: "100%",
                            backgroundColor: "#000",
                          }}
                        >
                          {children}
                        </div>
                      )}
                      renderThumb={({ props }) => (
                        <div
                          {...props}
                          style={{
                            ...props.style,
                            height: "20px",
                            width: "20px",
                            backgroundColor: "#000",
                            borderRadius: "9999px",
                            outline: 0,
                          }}
                        />
                      )}
                    />
                    <span className="hidden md:block ml-3 font-sans font-normal text-m">
                      {filteredDates[filteredDates.length - 1]}
                    </span>
                  </>
                ) : (
                  <>
                    <span className="hidden md:block mr-3 font-sans font-normal text-m whitespace-no-wrap">
                      –&nbsp;.&nbsp;–
                    </span>
                    <Range
                      step={1}
                      min={0}
                      max={0}
                      values={[]}
                      renderTrack={({ props, children }) => (
                        <div
                          {...props}
                          style={{
                            ...props.style,
                            height: "2px",
                            width: "100%",
                            backgroundColor: "#000",
                          }}
                        >
                          {children}
                        </div>
                      )}
                      renderThumb={({ props }) => (
                        <div
                          {...props}
                          style={{
                            ...props.style,
                            height: "20px",
                            width: "20px",
                            backgroundColor: "#000",
                            borderRadius: "9999px",
                            outline: 0,
                          }}
                        />
                      )}
                    />
                    <span className="hidden md:block ml-3 font-sans font-normal text-m  whitespace-no-wrap">
                      –&nbsp;.&nbsp;–
                    </span>
                  </>
                )}
              </div>
              <div
                className="col-span-6 md:hidden flex justify-between my-2 px-2 relative"
                style={{ boxShadow: "0px 4px 4px rgba(0, 0, 0, 0.25)" }}
              >
                {filteredDates.length > 1 && (
                  <>
                    <span className="font-sans font-normal text-m">
                      {filteredDates[0]}
                    </span>
                    <span className="font-sans font-normal text-m">
                      {filteredDates[filteredDates.length - 1]}
                    </span>
                  </>
                )}
              </div>
              <div className="px-2 col-span-6 flex items-center justify-around">
                <Filter />
                <div className="">
                  <select
                    onChange={(event) => {
                      setData((prev) => ({
                        ...prev,
                        filters: {
                          ...prev.filters,
                          city:
                            event.target.value === "alle Orte"
                              ? null
                              : event.target.value,
                          currentDate: 0,
                        },
                      }));
                    }}
                    className="my-1 mx-2 bg-lightGray rounded-full p-1 text-black calendar__select"
                    style={{ outline: 0 }}
                  >
                    {cities.map((item) => (
                      <option
                        value={item}
                        selected={item === "alle Orte" && city === null}
                      >
                        {item}
                      </option>
                    ))}
                  </select>

                  <select
                    onChange={(event) => {
                      setData((prev) => ({
                        ...prev,
                        filters: {
                          ...prev.filters,
                          division:
                            event.target.value === "alle Säulen"
                              ? null
                              : divisions.filter(
                                  (item) => item.name === event.target.value
                                )[0].id,
                          currentDate: 0,
                        },
                      }));
                    }}
                    className="my-1 mx-2 bg-lightGray rounded-full p-1 text-black calendar__select"
                    style={{ outline: 0, width: "100px" }}
                  >
                    {divisionsNames.map((item) => (
                      <option
                        value={item}
                        selected={item === "alle Säulen" && division === null}
                      >
                        {item}
                      </option>
                    ))}
                  </select>
                  {(division !== null || city !== null) && (
                    <button
                      className="px-2 py-1 bg-black text-white rounded-full"
                      onClick={() =>
                        setData((prev) => ({
                          ...prev,
                          filters: {
                            ...prev.filters,
                            division: null,
                            city: null,
                          },
                        }))
                      }
                      style={{ outline: 0, width: "100px" }}
                    >
                      clear
                    </button>
                  )}
                </div>
              </div>
            </div>
          </div>
        </>
      )}
    </div>
  );
};

export default CalendarHeader;
