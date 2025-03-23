<script>
    document.addEventListener("DOMContentLoaded", function () {
        /**
         * Check all the permissions
         */
        const checkPermissionAll = document.getElementById("checkPermissionAll");
        const checkboxes = document.querySelectorAll('input[type="checkbox"]');

        checkPermissionAll.addEventListener("click", function () {
            const isChecked = this.checked;
            checkboxes.forEach(checkbox => {
                checkbox.checked = isChecked;
            });
        });

        function checkPermissionByGroup(className, checkThis) {
            const groupIdName = document.getElementById(checkThis.id);
            const classCheckBoxes = document.querySelectorAll(`.${className} input`);

            classCheckBoxes.forEach(checkbox => {
                checkbox.checked = groupIdName.checked;
            });

            implementAllChecked();
        }

        function checkSinglePermission(groupClassName, groupID, countTotalPermission) {
            const classCheckBoxes = document.querySelectorAll(`.${groupClassName} input`);
            const groupIDCheckBox = document.getElementById(groupID);

            const checkedCount = Array.from(classCheckBoxes).filter(checkbox => checkbox.checked).length;

            groupIDCheckBox.checked = (checkedCount === countTotalPermission);

            implementAllChecked();
        }

        function implementAllChecked() {
            const countPermissions = {{ count($all_permissions) }};
            const countPermissionGroups = {{ count($permission_groups) }};
            const totalCheckboxes = countPermissions + countPermissionGroups;

            const checkedCount = document.querySelectorAll('input[type="checkbox"]:checked').length;

            checkPermissionAll.checked = (checkedCount >= totalCheckboxes);
        }

        // Expose functions to the global scope if needed
        window.checkPermissionByGroup = checkPermissionByGroup;
        window.checkSinglePermission = checkSinglePermission;
    });
</script>