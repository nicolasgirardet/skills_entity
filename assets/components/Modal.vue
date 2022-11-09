<template>

<div 
v-if="shows"
class="block-modal"
>

    <div 
    class="overlay"
    @click="toggleModal()"
    ></div>

    <div class="modal">
        <button 
        class="confirm-btn p-1 flex items-center border-tualuBlue hover:text-white hover:bg-tualuBlue text-tualuBlue cursor-pointer text-center font-montserrat rounded font-bold border-2 text-sm"
        @click="confirmAction()"
        >confirmer</button>
        <button 
        class="back-btn p-1 flex items-center border-tualuBlue hover:text-white hover:bg-tualuBlue text-tualuCoral cursor-pointer text-center font-montserrat rounded font-bold border-2 text-sm"
        @click="toggleModal()"
        >retour</button>
        <h2>Confirmez-vous {{ action }} de cette compétence ?</h2>
    </div>

</div>

</template>

<script>

export default {
    name: 'Modal',
    props: ['shows', 'toggleModal', 'confirmAction', 'action'],
}


</script>

<style scoped>
.block-modal {
    position: fixed;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    width: 100%;
    height: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
}

.overlay {
    background: rgba(0,0,0,0.5);
    position: fixed;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
}

.modal {
    background: #f1f1f1;
    color: #333;
    padding: 50px;
    position: fixed;
}

.confirm-btn {
    position: absolute;
    top: 10px;
    right: 10px;
}

.back-btn {
    position: absolute;
    top: 10px;
    right: 100px;
}
</style>