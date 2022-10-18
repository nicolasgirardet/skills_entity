<template>
    <svg
        :width="width"
        :height="height"
        viewBox="0 0 25 25"
        fill="none"
        xmlns="http://www.w3.org/2000/svg"
    >
        <path
            fill-rule="evenodd"
            clip-rule="evenodd"
            d="M17.7157 5.5C17.5074 5.5 17.2907 5.58333 17.1324 5.74167L15.6074 7.26667L18.7324 10.3917L20.2574 8.86667C20.5824 8.54167 20.5824 8.01667 20.2574 7.69167L18.3074 5.74167C18.1407 5.575 17.9324 5.5 17.7157 5.5ZM14.7157 10.5167L15.4824 11.2834L7.93236 18.8334H7.16569V18.0667L14.7157 10.5167ZM5.49902 17.375L14.7157 8.15829L17.8407 11.2833L8.62402 20.5H5.49902V17.375Z"
            :fill="fillColor"
        />
    </svg>
</template>

<script>
export default {
  name: "PenSVG",
  props: {
    width: {
      type: [Number, String],
      default: 20
    },
    height: {
      type: [Number, String],
      default: 20
    },
    fillColor: {
      type: [Number, String],
      default: "white"
    },
  }
};
</script>
