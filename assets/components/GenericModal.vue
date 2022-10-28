<template functionnal>
  <div class="m-auto">
    <div
      class="overflow-y-scroll-auto fixed inset-x-0 bottom-0 md:inset-0 z-30 justify-center items-center flex"
    >
      <div
        class="md:mx-6 rounded-lg shadow-3xl relative bg-white w-full md:w-auto m-2 text-tualuGray-text"
      >
        <div
          class="flex items-center justify-between p-2 md:p-5 border-b border-tualuGray-border text-sm md:text-xl"
        >
          <h3 class="font-montserrat font-black text-tualuBlue">
            {{ title }}
          </h3>
          <button
            class="font-bold text-2xl"
            title="Cliquez pour fermer"
            aria-label="Cliquez pour fermer"
            @click="
              isEmittingEventToParent
                ? $emit('closeModal')
                : $parent.$emit('closeModal')
            "
          >
            X
          </button>
        </div>
        <div :class="containerStyling">
          <slot></slot>
        </div>
      </div>
    </div>
    <!-- background -->
    <div class="fixed inset-0 z-20 bg-black opacity-25" />
  </div>
</template>

<script>
export default {
  name: "GenericModal",
  props: {
    title: {
      type: String,
      required: true,
    },
    containerStyling: {
      type: String,
      default:
        "flex flex-col md:flex-row items-center md:space-x-5 md:px-5 md:pb-5",
      required: false,
    },
    isEmittingEventToParent: {
      type: Boolean,
      default: true,
      required: false,
    },
  },
};
</script>
