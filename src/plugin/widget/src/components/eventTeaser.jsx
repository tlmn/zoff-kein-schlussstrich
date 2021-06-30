import PropTypes from "prop-types";
import React from "react";
import { generateSrcSet } from "../lib/lib";

const EventTeaser = ({
  key,
  borderBottom = false,
  ...eventData
}) => {
  const { feature_image, tags, venue, ticketlink, link, time, title } = eventData;
  return (
    <div
      className={`col-span-full px-2 grid-6 md:grid-16 no-underline py-6 ${borderBottom ? `border-b-2` : ``
        }`}
      style={{ minHeight: "230px" }}
      key={key}
    >
      {feature_image.sizes && (
        <div className="col-span-6 md:col-span-3 col-start-1 md:col-start-2">
          <div className="ratio--4-3 relative">
            <img
              srcSet={generateSrcSet(feature_image.sizes)}
              className="absolute top-0 left-0 right-0 bottom-0 object-cover image-bw"
              alt={feature_image.alt}
            />
          </div>
        </div>
      )}

      <div
        className={`col-span-full md:col-span-${feature_image.sizes ? `11` : `14 md:col-start-2`
          } h-full flex flex-col pt-4 md:pt-0`}
      >
        <div className="font-sans font-medium text-sm md:text-base flex justify-between">
          <div>
            {tags.map(
              (item) => item && <span className="mr-1">#{item}</span>
            )}
          </div>
          <div className="hidden md:block">
            {venue.name !== "" && (
              <a
                href={venue.url}
                target="_blank"
                rel="noreferrer"
                className="underline hover:no-underline"
              >
                {venue.name}
              </a>
            )}
            {ticketlink !== "" && (
              <a
                href={ticketlink}
                rel="noreferrer"
                className="underline hover:no-underline"
              >
                Tickets
              </a>
            )}
          </div>
        </div>
        <a
          className="flex flex-1 flex-col justify-end z-20"
          href={link}
        >
          <span className="block font-sans font-medium text-xl md:text-2xl leading-snug">
            {time}h
          </span>
          <span className="block font-sans font-medium text-xl md:text-2xl leading-snug mt-1 md:mt-2"
            dangerouslySetInnerHTML={{ __html: title }} />
        </a>
      </div>
      {venue.name !== "" && ticketlink !== "" &&
        <div className="col-span-full md:hidden block pt-4 md:pt-0">
          {venue.name !== "" && (
            <a
              href={venue.url}
              target="_blank"
              rel="noreferrer"
              className="underline hover:no-underline"
            >
              {venue.name}
            </a>
          )}
          {ticketlink !== "" && (
            <a
              href={ticketlink}
              rel="noreferrer"
              className="underline hover:no-underline bg-black rounded-xl py-1 px-3"
            >
              Tickets
            </a>
          )}
        </div>}

    </div>
  )
};

EventTeaser.propTypes = {
  key: PropTypes.string,
  borderBottom: PropTypes.bool,
};

export default EventTeaser;
