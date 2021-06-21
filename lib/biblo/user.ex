defmodule Biblo.User do
  @moduledoc """
    Biblo.User
  """

  use Ecto.Schema

  import Ecto.Changeset

  alias Ecto.Changeset
  alias Biblo.Loaning


  @primary_key{:id, :binary_id, autogenerate: true}
  @required_params [:cpf, :name, :email, :password]

  schema "users" do
    field :cpf, :string
    field :name, :string
    field :email, :string
    field :password_hash, :string
    field :password, :string, virtual: true
    has_many :loanings, Loaning

    timestamps()
  end

  def changeset(params) do
    %__MODULE__{}
    |> cast(params, @required_params)
    |> validate_required(@required_params)
    |> validate_length(:password, min: 8)
    |> validate_length(:cpf, min: 11, max: 11)
    |> validate_format(:email, ~r/@/)
    |> unique_constraint([:cpf])
    |> unique_constraint([:email])
    |> hash_plain_password()
  end

  defp hash_plain_password(%Changeset{valid?: true, changes: %{password: password}} = changeset) do
    change(changeset, Bcrypt.add_hash(password))
  end

  defp hash_plain_password(changeset), do: changeset
end
