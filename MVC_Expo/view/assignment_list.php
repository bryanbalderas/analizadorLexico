<?php include('view/header.php')?>

<section id="list" class="list">
    <header class="list__row list__header">
        <h1>Tareas</h1>
        <form action="." method="get" id="list__header_select" class="list__header_select">
            <input type="hidden" name="action" value="list_assignments">
            <select name="course_id" required>
                <option value="0">Ver todos</option>
                <?php foreach ($courses as $course) : ?>
                <?php if($course_id==$course['courseID']) { ?>
                <option value="<?= $course['courseID'] ?>" selected>
                    <?php } else { ?>
                <option value="<?= $course['courseID'] ?>">
                    <?php } ?>
                    <?= $course['courseName'] ?>
                </option>
                <?php endforeach; ?>
            </select>
            <button class="add-button bold">Enviar</button>
        </form>
    </header>
    <?php if($assignments){ ?>
        <?php foreach ($assignments as $assignment) : ?>
        <div class="list__row">
            <div class="list__item">
                <p class="bold"><?= $assignment['courseName'] ?></p>
                <p><?= $assignment['Description'] ?></p>
            </div>
            <div class="list__removeItem">
                <form action="." method="post">
                    <input type="hidden" name="action" value="delete_assignment">
                    <input type="hidden" name="assignment_id" value="<?= $assignment['ID'] ?>">
                    <button class="remove-button">❌</button>
                </form>
            </div>
        </div>
        <?php endforeach; ?>
        <?php } else { ?>
        <br>
        <?php if ($course_id){ ?>
            <p>No existen tareas para este curso</p>
        <?php } else { ?>
            <p>No existen tareas aun</p>
        <?php } ?>
        <br>
        <?php } ?>
</section>

<section id="add" class="add">
    <h2>Agregar tarea</h2>
    <form action="." method="post" id="add__form" class="add__form">
        <input type="hidden" name="action" value="add_assignment">
        <div class="add__inputs">
            <label>Curso: </label>
            <select name="course_id" required>
                <option value="">Por favor seleccione uno</option>
                <?php foreach ($courses as $course) : ?>
                <option value="<?= $course['courseID']; ?>">
                    <?= $course['courseName']; ?>
                </option>
                <?php endforeach; ?>
            </select>
            <label>Descripcion:</label>
            <input type="text" name="description" maxlength="120" placeholder="Descripcion" required>
        </div>
        <div class="add__addItem">
            <button class="add-button bold">Agregar</button>
        </div>
    </form>
</section>
<br>
<p><a href=".?action=list_courses">Ver/Editar Cursos</a></p>
<?php include('view/footer.php')?>