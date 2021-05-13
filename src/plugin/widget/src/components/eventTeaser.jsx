import PropTypes from "prop-types";
import React from "react";
import { generateSrcSet } from "../lib/lib";

const EventTeaser = ({ key, borderBottom = false, ...eventData }) => (
  <div
    className={`col-span-full px-2 grid-6 md:grid-16 no-underline py-6 ${borderBottom ? `border-b-2`: ``}`}
    style={{ minHeight: "230px" }}
    key={key}
  >
    {eventData.feature_image.sizes && (
      <div className="col-span-6 md:col-span-3 col-start-1 md:col-start-2">
        <div className="relative w-full ratio--16-9 md:ratio--3-2 z-0">
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
        eventData.feature_image.sizes ? `11` : `14 md:col-start-2`
      } h-full flex flex-col pt-4 md:pt-0`}
    >
      <div className="font-sans font-medium text-sm md:text-base flex justify-between">
        <div>
          {eventData.tags.map(
            (item) => item && <span className="mr-1">#{item}</span>
          )}
        </div>
        <div className="hidden md:block">
          {eventData.venue.name !== "" && (
            <a
              href={eventData.venue.url}
              target="_blank"
              rel="noreferrer"
              className="underline hover:no-underline"
            >
              {eventData.venue.name}
            </a>
          )}
          {eventData.ticketlink !== "" && (
            <a
              href={eventData.ticketlink}
              rel="noreferrer"
              className="underline hover:no-underline"
            >
              Tickets
            </a>
          )}
        </div>
      </div>
      <a
        className="flex flex-1 flex-col justify-end mt-6 md:mt-0"
        href={eventData.link}
      >
        <span className="block font-sans font-medium text-xl md:text-2xl leading-snug">
          {eventData.time}h
        </span>
        <span className="block font-sans font-medium text-xl md:text-2xl leading-snug mt-1 md:mt-2">
          {eventData.title}
        </span>
      </a>
    </div>
    <div className="col-span-full md:hidden block pt-4 md:pt-0">
      {eventData.venue.name !== "" && (
        <a
          href={eventData.venue.url}
          target="_blank"
          rel="noreferrer"
          className="underline hover:no-underline"
        >
          {eventData.venue.name}
        </a>
      )}
      {eventData.ticketlink !== "" && (
        <a
          href={eventData.ticketlink}
          rel="noreferrer"
          className="underline hover:no-underline"
        >
          Tickets
        </a>
      )}
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
EventTeaser.propTypes = {
  key: PropTypes.number,
  borderBottom: PropTypes.bool,
};

export default EventTeaser;
