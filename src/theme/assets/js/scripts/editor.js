wp.domReady(() => {
  wp.blocks.registerBlockStyle("core/paragraph", {
    name: "default",
    label: "Default",
    isDefault: true,
  });

  wp.blocks.registerBlockStyle("core/paragraph", {
    name: "text--large",
    label: "Text Large",
  });

  wp.blocks.registerBlockStyle("core/paragraph", {
    name: "text--big",
    label: "Text Big",
  });

  wp.blocks.registerBlockStyle("core/paragraph", {
    name: "text--medium",
    label: "Text Medium",
  });

  wp.blocks.registerBlockStyle("core/paragraph", {
    name: "text--running",
    label: "Running Text",
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
});
