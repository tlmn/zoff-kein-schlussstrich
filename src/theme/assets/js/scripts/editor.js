wp.domReady(() => {
  wp.blocks.registerBlockStyle("core/paragraph", {
    name: "text--running",
    label: "Running Text",
    isDefault: true,
  });

  wp.blocks.registerBlockStyle("core/paragraph", {
    name: "text--large",
    label: "Text Large",
  });

  wp.blocks.registerBlockStyle("core/paragraph", {
    name: "text--medium",
    label: "Text Medium",
  });

  wp.blocks.registerBlockStyle("core/paragraph", {
    name: "text--small",
    label: "Text Small",
  });

  wp.blocks.registerBlockStyle("core/paragraph", {
    name: "quote--large",
    label: "Zitat Large",
  });

  wp.blocks.registerBlockStyle("core/paragraph", {
    name: "quote--medium",
    label: "Zitat Medium",
  });

  wp.blocks.registerBlockStyle("core/paragraph", {
    name: "quote--small",
    label: "Zitat Small",
  });

  wp.blocks.registerBlockStyle("core/paragraph", {
    name: "author",
    label: "Autor:in",
  });

  wp.blocks.registerBlockStyle("core/button", {
    name: "button--blue",
    label: "blau",
  });

  wp.blocks.registerBlockStyle("core/button", {
    name: "button--yellow",
    label: "gelb",
  });

  wp.blocks.registerBlockStyle("core/button", {
    name: "button--black--arrow-right",
    label: "schwarz: Pfeil rechts",
  });

  wp.blocks.registerBlockStyle("core/button", {
    name: "button--black",
    label: "schwarz: kein Pfeil",
  });

  wp.blocks.unregisterBlockStyle("core/button", ["outline", "squared", "fill"]);
});
