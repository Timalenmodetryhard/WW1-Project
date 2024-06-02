<section class="events">
    <h2 class="title-page">Events</h2>
    <?php $i=0; ?>
    <?php if (!empty($data['data'])): ?>
        <?php foreach ($data['data'] as $row): ?>
            <?php if ($i<3):?>
                <?php $i+=1; ?>
                <div class="event<?php echo $i; ?> event">
                    <?php if ($i%2===1): ?>
                        <article class="event-img">
                            <img src="<?php echo $row["image"]; ?>" alt="memorial WW1">
                        </article>
                        <article class="event-text">
                            <h2><?php echo $row["title"]; ?></h2>
                            <p><?php echo $row["description"]; ?></p>
                        </article>
                    <?php else: ?>
                        <article class="event-text">
                            <h2><?php echo $row["title"]; ?></h2>
                            <p><?php echo $row["description"]; ?></p>
                        </article>
                        <article class="event-img">
                            <img src="<?php echo $row["image"]; ?>" alt="memorial WW1">
                        </article>
                    <?php endif ?>
                </div>  
            <?php endif ?>
        <?php endforeach ?>
    <?php else: ?>
        <h2>There is no events for now, more are coming in the future...</h2>
    <?php endif ?>
  </section>