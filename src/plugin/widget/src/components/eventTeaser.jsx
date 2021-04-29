import React from "react";
import { generateSrcSet } from "../lib/lib";

const EventTeaser = ({ labels = "", ...eventData }) => (
  <div
    className="col-span-full grid-6 md:grid-16 no-underline py-2 border-b-2"
    style={{ minHeight: "230px" }}
  >
    {eventData.feature_image.sizes && (
      <div className="col-span-6 md:col-span-3 col-start-1 md:col-start-3">
        <div className="relative w-full ratio--3-2">
          <img
            srcSet={generateSrcSet(eventData.feature_image.sizes)}
            className="w-full h-full absolute top-0 left-0 right-0 bottom-0 object-cover image-bw"
            alt={eventData.feature_image.alt}
          />
        </div>
      </div>
    )}

    <div
      className={`col-span-full md:col-span-${
        !eventData.feature_image.image ? `9` : `7`
      } ${
        !eventData.feature_image.image ? `col-start-1` : ``
      } h-full flex flex-col`}
    >
      <div className="font-sans flex justify-between">
        <div>
          {eventData.tags.map(
            (item) => item && <span className="mr-1">#{item}</span>
          )}
        </div>
        <div>
          {eventData.venue.name !== "" && (
            <a
              href={eventData.venue.url}
              target="_blank"
              referrerPolicy="no-referrer"
              className="underline hover:no-underline"
            >
              {eventData.venue.name}
            </a>
          )}
          {eventData.ticketlink !== "" && (
            <a
              href={eventData.ticketlink}
              referrerPolicy="no-referrer"
              className="underline hover:no-underline"
            >
              Tickets
            </a>
          )}
        </div>
      </div>
      <a className="flex flex-1 flex-col justify-end" href={eventData.link}>
        <span className="block font-sans md:text-2xl md:leading-snug">
          {eventData.time}h
        </span>
        <span className="block font-sans md:text-2xl md:leading-snug">
          {eventData.title}
        </span>
      </a>
    </div>
    <div className="col-span-3 flex justify-end">
      {eventData.ticketlink !== "" && (
        <a
          href={eventData.ticketlink}
          className="block font-sans underline hover:no-underline"
          target="_blank"
          rel="noreferrer"
        >
          Tickets
        </a>
      )}
    </div>
  </div>
);

export default EventTeaser;
