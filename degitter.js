const degit = require('degit');

const repos = [
  'dictionary',
  'kwl',
  'goodreads-oauth',
  'projects',
  'php-to-javascript',
  'classroom-avatars',
  'planner',
  'php-course-mysql',
  'ket-vocabulary',
  'php-course',
];

repos.forEach(repo => {
  const emitter = degit(`rheajt/${repo}`, {
    force: true,
  });

  emitter.on('info', info => {
    console.log(info.message);
  });

  emitter.clone(`./projects/${repo}`).then(() => {
    console.log('done');
  });
});
