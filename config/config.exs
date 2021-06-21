# This file is responsible for configuring your application
# and its dependencies with the aid of the Mix.Config module.
#
# This configuration file is loaded before any dependency and
# is restricted to this project.

# General application configuration
use Mix.Config

config :biblo,
  ecto_repos: [Biblo.Repo]

# Configures the endpoint
config :biblo, BibloWeb.Endpoint,
  url: [host: "localhost"],
  secret_key_base: "pGCC2TZlbns9sqaUgVLmvSiMyW/4RpVqR8T7qE3duk7iqmrHxbRfslvT5RnXpd3t",
  render_errors: [view: BibloWeb.ErrorView, accepts: ~w(json), layout: false],
  pubsub_server: Biblo.PubSub,
  live_view: [signing_salt: "D1Fa3rw3"]

config :biblo, Biblo.Repo,
  migration_primary_key: [type: :binary_id],
  migration_foreign_key: [type: :binary_id]

config :biblo, :basic_auth,
  username: "kleyson",
  password: "root"

# Configures Elixir's Logger
config :logger, :console,
  format: "$time $metadata[$level] $message\n",
  metadata: [:request_id]

# Use Jason for JSON parsing in Phoenix
config :phoenix, :json_library, Jason

# Import environment specific config. This must remain at the bottom
# of this file so it overrides the configuration defined above.
import_config "#{Mix.env()}.exs"
