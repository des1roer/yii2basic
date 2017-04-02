Vue.component('modal', {
    template: '#modal-template',
})

var vm = new Vue({
    el: '#app',
    data: {
        showModal: false,
    },
    methods: {
        open: function (data) {
            this.showModal = true;
        }
    }
})

$(document).keyup(function (e) {
    if (e.keyCode == 27) { // escape key maps to keycode `27`
        vm.showModal = false
    }
});