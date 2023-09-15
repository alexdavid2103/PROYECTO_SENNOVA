new FinisherHeader({
  count: 6,
  size: {
    min: 1100,
    max: 1300,
    pulse: 0,
  },
  speed: {
    x: {
      min: 0.1,
      max: 0.3,
    },
    y: {
      min: 0.1,
      max: 0.3,
    },
  },
  colors: {
    background: "#00ff00",
    particles: ["#39a900", "#1b4900", "#ffffff"],
  },
  blending: "overlay",
  opacity: {
    center: 1,
    edge: 0.1,
  },
  skew: -2,
  shapes: ["c"],
});
