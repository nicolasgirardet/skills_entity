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
        class="back-btn"
        @click="toggleModal()"
        >retour</button>
        <button 
        class="confirm-btn"
        @click="confirmAction()"
        >confirmer</button>
        <h2>Confirmez-vous la modification de cette compétence ?</h2>
    </div>

</div>

</template>

<script>

export default {
    name: 'Modal',
    props: ['shows', 'toggleModal', 'confirmAction'],
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

.back-btn {
    position: absolute;
    top: 10px;
    right: 10px;
}

.confirm-btn {
    position: absolute;
    top: 10px;
    right: 80px;
}
</style>